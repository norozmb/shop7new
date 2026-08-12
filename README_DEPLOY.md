Deployment instructions
---------------------

1. Build and test the Docker image locally:
```bash
docker build -t shop7new:local .
docker run -p 8080:80 shop7new:local
```

2. Deploy to Render using the `render.yaml` manifest:
   - Create an account on https://render.com and connect your GitHub repo.
   - Push this repository to GitHub.
   - In Render, choose "New -> Web Service" and import the repo, or use the `render.yaml` to create the service.

3. Add environment variables (DB credentials) in the Render dashboard — do not store secrets in the repo.
