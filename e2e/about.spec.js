// @ts-check
import { test, expect } from '@playwright/test';

test('halaman utama memiliki judul dan tautan', async ({ page }) => {
  // Buka halaman aplikasi Anda
  await page.goto('http://127.0.0.1:8000');

  // Mengharapkan judul halaman mengandung "FLORA SHOP"
  await expect(page).toHaveTitle(/Flora Shop/);

  // Tunggu elemen "About" tersedia
  await page.waitForSelector('#nav-link-about', { timeout: 10000 });

  // Mendapatkan elemen About dan memeriksa atribut href
  const navLinkAbout = page.locator('#nav-link-about');
  const hrefValue = await navLinkAbout.getAttribute('href');
  console.log("Href value of about link:", hrefValue);

  // Mengharapkan href sesuai
  await expect(navLinkAbout).toHaveAttribute('href', 'http://127.0.0.1:8000/about');

  // Klik pada tautan "About"
  await navLinkAbout.click();

  // Tambahkan waktu tunggu untuk memastikan halaman termuat
  await page.waitForTimeout(3000);

  // Mengharapkan URL mengandung "about"
  await expect(page).toHaveURL(/.*about/);

  // Klik tombol shop now
  await page.click('button:text("Shop now")');

  // Lanjutkan ke halaman shop
  await page.goto('http://127.0.0.1:8000/shop');
});
