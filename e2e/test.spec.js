// @ts-check
import { test, expect } from '@playwright/test';

test('halaman utama memiliki judul dan tautan', async ({ page }) => {
  // Buka halaman aplikasi Anda
  await page.goto('http://127.0.0.1:8000');

  // Mengharapkan judul halaman mengandung "FLORA SHOP"
  await expect(page).toHaveTitle(/Flora Shop/);

  // Tunggu elemen "Login" tersedia
  await page.waitForSelector('#nav-link-login', { timeout: 10000 });

  // Mendapatkan elemen Login dan memeriksa atribut href
  const navLinkLogin = page.locator('#nav-link-login');
  const hrefValue = await navLinkLogin.getAttribute('href');
  console.log("Href value of login link:", hrefValue);

  // Mengharapkan href sesuai
  await expect(navLinkLogin).toHaveAttribute('href', 'http://127.0.0.1:8000/login');

  // Klik pada tautan "Login"
  await navLinkLogin.click();

  // Tambahkan waktu tunggu untuk memastikan halaman termuat
  await page.waitForTimeout(3000);

  // Mengharapkan URL mengandung "login"
  await expect(page).toHaveURL(/.*login/);

  // Isi username dan password
  await page.fill('#inputEmailAddress', 'fahh@gmail.com'); // Sesuaikan selector dan username
  await page.fill('#inputChoosePassword', 'fah12345'); // Sesuaikan selector dan password

  // Klik tombol login
  await page.click('button:text("Login")');

  // Lanjutkan ke halaman utama
  await page.goto('http://127.0.0.1:8000');
});
