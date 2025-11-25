# CKEditor5 Custom Build Template

This template helps you create a self-hosted CKEditor 5 custom build that includes common non-premium plugins (font, image upload, table, lists, media embed, alignment, etc.).

## Steps to build
1. Install Node.js (recommended >= 14).
2. In this folder run:
   ```bash
   npm install
   npm run build
   ```
3. After build, `build/ckeditor.js` will be generated. Use `src/index.html` or integrate `build/ckeditor.js` into your app.

## Upload adapter
A simple PHP `upload.php` is included which expects an `upload` file field and returns JSON `{{ "url": "uploads/filename.ext" }}`.

## Note about premium plugins / license
Premium plugins (Track Changes, Comments, Collaboration, Export to PDF/Word, Cloud AI) are **not included**. If you require premium features you need a CKEditor license key and to add your domain to licensed hosts in your CKEditor account dashboard.

---

Uploaded file note:
A file previously uploaded during this conversation is available at the following local path on the assistant environment (for your reference):
`/mnt/data/environmental_sustainability_edit.php`

