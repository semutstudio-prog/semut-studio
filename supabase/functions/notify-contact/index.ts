// Edge Function: notify-contact
// Dipicu oleh Database Webhook (INSERT ke tabel messages).
// Mengirim email notifikasi lewat Resend.
//
// Setup di Supabase:
//  1. Dashboard > Edge Functions > Deploy fungsi ini
//  2. Set secrets: RESEND_API_KEY (https://resend.com), NOTIFY_EMAIL (alamat tujuan)
//  3. Dashboard > Database > Webhooks > tambah webhook:
//       - Table: messages, Event: INSERT
//       - Method: POST, URL: https://<project-ref>.functions.supabase.co/notify-contact
//       - Content-Type: application/json

import { Resend } from "npm:resend@2.0.0";

const RESEND_API_KEY = Deno.env.get("RESEND_API_KEY") ?? "";
const NOTIFY_EMAIL = Deno.env.get("NOTIFY_EMAIL") ?? "";

const corsHeaders = {
  "Access-Control-Allow-Origin": "*",
  "Access-Control-Allow-Headers": "authorization, x-client-info, apikey, content-type",
};

Deno.serve(async (req) => {
  if (req.method === "OPTIONS") {
    return new Response("ok", { headers: corsHeaders });
  }

  try {
    const body = await req.json();
    const record = body?.record;
    if (!record) {
      return new Response("no record", { status: 400, headers: corsHeaders });
    }

    const name = record.name ?? "-";
    const email = record.email ?? "-";
    const subject = record.subject ?? "Tanpa subjek";
    const message = record.message ?? "";

    if (!RESEND_API_KEY || !NOTIFY_EMAIL) {
      return new Response("missing secrets", { status: 500, headers: corsHeaders });
    }

    const html = `
      <div style="font-family:Inter,Arial,sans-serif;max-width:560px;margin:0 auto;">
        <h2 style="color:#121214;margin-bottom:4px;">Pesan baru dari website</h2>
        <p style="color:#6B6B76;margin-top:0;">SEMUT Studio — Form Kontak</p>
        <table style="width:100%;border-collapse:collapse;font-size:14px;">
          <tr><td style="padding:8px 0;color:#6B6B76;width:90px;">Nama</td>
              <td style="padding:8px 0;"><strong>${escapeHtml(name)}</strong></td></tr>
          <tr><td style="padding:8px 0;color:#6B6B76;">Email</td>
              <td style="padding:8px 0;"><a href="mailto:${escapeAttr(email)}">${escapeHtml(email)}</a></td></tr>
          <tr><td style="padding:8px 0;color:#6B6B76;">Proyek</td>
              <td style="padding:8px 0;">${escapeHtml(subject)}</td></tr>
        </table>
        <div style="background:#F7F7FA;border:1px solid #E2E2E8;border-radius:12px;padding:16px;margin-top:8px;">
          <p style="margin:0;white-space:pre-wrap;line-height:1.6;">${escapeHtml(message)}</p>
        </div>
        <p style="color:#9A9AA3;font-size:12px;margin-top:24px;">Dikirim ${new Date(record.created_at).toLocaleString("id-ID")}</p>
      </div>
    `;

    await resend.emails.send({
      from: "SEMUT Studio <onboarding@resend.dev>",
      to: [NOTIFY_EMAIL],
      subject: `Kontak baru: ${subject} — ${name}`,
      html,
    });

    return new Response("ok", { status: 200, headers: corsHeaders });
  } catch (err) {
    return new Response(err instanceof Error ? err.message : "error", {
      status: 500,
      headers: corsHeaders,
    });
  }
});

function escapeHtml(value: string): string {
  return value
    .replace(/&/g, "&amp;")
    .replace(/</g, "&lt;")
    .replace(/>/g, "&gt;")
    .replace(/"/g, "&quot;")
    .replace(/'/g, "&#39;");
}

function escapeAttr(value: string): string {
  return value.replace(/[&<>"']/g, (c) => {
    const map: Record<string, string> = {
      "&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;", "'": "&#39;",
    };
    return map[c];
  });
}
