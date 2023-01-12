![Macrame](https://user-images.githubusercontent.com/36259611/212025288-217def6a-ff54-46cd-b0f9-bf25db910a59.png)

## Setup

Create a new cms project named `your-website` by running

```sh
composer create-project aw-studio/macrame-cms:dev-main your-website

```

Create a database and add the credentials in the`.env` file. Then run the following command to migrate
and seed with some basic data.

```sh
php artisan migrate:fresh --seed
```

Install the NPM dependencies and start the dev script

```sh
npm install && npm run dev
```

You should now be able to visit `your-website.test/admin` and login with default admin credentials:

```
username: admin
password: secret
```
