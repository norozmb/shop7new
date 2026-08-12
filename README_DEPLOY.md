Deployment instructions
---------------------

This project is PHP-based and requires a PHP-capable host.

1. Push this repository to GitHub.
2. Choose a PHP host that supports PHP and MySQL/MariaDB.
3. Import `shop (3).sql` into your database.
4. Configure the host with these environment variables:
   - `DB_SERVER`
   - `DB_USER`
   - `DB_PWD`
   - `DB_NAME`
5. Ensure `admin/config.php` uses these environment variables.

If your host does not support environment variables directly, set them in the host dashboard or a `.env` file.
