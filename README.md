# Installation Instructions for Hotel Registration

Prerequisites

1. **PHP**: Ensure you have PHP installed on your machine I have been requested to utilize the latest version available, which is 8.3.9.. You can download it from [PHP official website](https://www.php.net/).
2. **Composer**: Ensure you have Composer installed. You can download it from [Composer official website](https://getcomposer.org/).
3. **Git**: Ensure you have Git installed. You can download it from [Git official website](https://git-scm.com/).
4. **Docker**: Ensure you have Docker and Docker Compose installed. You can download them from [Docker official website](https://www.docker.com/).

### Step-by-Step Installation Guide

1. **Clone the Repository**
   Open your terminal and run the following command to clone the repository:

    ```
    git clone https://github.com/Awas96/Hotel_Registration.git
    
    ```

2. **Navigate to the Project Directory**

    ```
    cd Hotel_Registration
    
    ```

3. **Set Up Environment Variables**
   Create a .env.local file in the main project directory and input your environment variables. While you can refer to the original .env file for guidance, i have ensured to include the a copy with the required  lines in this file.

    ```
    APP_ENV=dev
    APP_SECRET=3292d6aac1b68599be0f0d621b3f326f
    DATABASE_URL="mysql://symfony:symfony@mysqldb:3306/hotel_database?serverVersion=9.0"
    CORS_ALLOW_ORIGIN='^https?://(localhost|127\.0\.0\.1)(:[0-9]+)?$'
    MAILER_URL="smtp://mailhog:1025?encryption=ssl&auth_mode=login&username=null&password=null"
    MAILER_DSN=smtp://mailhog:1025
    WEBHOOK_URL="https://webhook.site/e517553c-6fcb-4ade-9524-208e2d6c4068"
    ```

4. **Install Dependencies**
   Run the following command to install all necessary dependencies:

    ```
    composer install
    
    ```

5. **Start Docker Containers**
   Start the Docker containers defined in the `docker-compose.yml` file:

    ```
    docker compose up -d
    
    ```

6. **Generate SSL Keys for JWT Authentication**
   Generate the private and public keys for JWT authentication:

   Note that the `setfacl` command relies on the `acl`  This is installed by default when using the API Platform docker distribution but may need to be installed in your working environment in order to execute the `setfacl` command..

   In case the nginx container encounters an error, it is possible that there is a problem with the permissions on the fold.

    ```
    docker exec -it hotel_registration_php sh        -c '
    	 apk add openssl
    	 mkdir var/cert/
    	 cd var/cert/
       echo "your_secure_password" > global.pass
       openssl genpkey -algorithm RSA -out server.key -aes256 -pass file:global.pass -pkeyopt rsa_keygen_bits:2048
    		openssl req -new -key server.key -out server.csr -passin file:global.pass
    		openssl rsa -in server.key -out server.key -passin file:global.pass
    		openssl x509 -req -days 365 -in server.csr -signkey server.key -out server.crt -passin file:global.pass
    		cd ../../
        php bin/console lexik:jwt:generate-keypair
        setfacl -R -m u:www-data:rX -m u:"$(whoami)":rwX config/jwt
        setfacl -dR -m u:www-data:rX -m u:"$(whoami)":rwX config/jwt
    '
    	
    ```

7. **Create Database**
   Execute the command below to generate the schema since the database has already been created by the docker compose component.

    ```
    
    docker compose exec php bin/console doctrine:schema:update --force
    
    ```

   Restart the docker compose to refresh nginx with the updated certificate.

    ```
    docker compose up -d
    
    ```


At this time, you should have a functiona hotel_registration instance on your machine and prepared to begin working with it.