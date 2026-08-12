Deployment instructions
---------------------

1. Build and test the Docker image locally:
```bash
docker build -t shop7new:local .
docker run -p 8080:80 shop7new:local
```

2. Deploy to Railway using the `Dockerfile`:
   - Create an account on https://railway.app and connect your GitHub repo `norozmb/shop7new`.
   - Create a new project and choose "Deploy from GitHub".
   - Railway will detect the `Dockerfile` and build the image.

3. Add environment variables in Railway settings:
   - `DB_SERVER`
   - `DB_USER`
   - `DB_PWD`
   - `DB_NAME`

4. Add a MySQL plugin in Railway and copy the generated credentials into the environment variables above.

5. Deploy the project and open the Railway-generated URL.

Note: This is a PHP application, so GitHub Pages and Vercel are not suitable for running the full backend.
