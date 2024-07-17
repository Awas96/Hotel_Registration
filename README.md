</head><body><article id="a4d250ed-b3d4-4c87-a9ba-35549b309c53" class="page sans"><header><h1 class="page-title">Installation Instructions for Hotel Registration</h1><p class="page-description"></p></header><div class="page-body"><p id="b54da5be-d036-489f-8046-35d320ea3a3f" class="">Prerequisites</p><ol type="1" id="f27645f0-301b-4652-aabc-2b0eece1da87" class="numbered-list" start="1"><li><strong>PHP</strong>: Ensure you have PHP installed on your machine I have been requested to utilize the latest version available, which is 8.3.9.. You can download it from <a href="https://www.php.net/">PHP official website</a>.</li></ol><ol type="1" id="358d9530-4464-40b6-88ad-7ccddf741f26" class="numbered-list" start="2"><li><strong>Composer</strong>: Ensure you have Composer installed. You can download it from <a href="https://getcomposer.org/">Composer official website</a>.</li></ol><ol type="1" id="0aad2a77-331d-4c51-bc56-1fe3ff1914d7" class="numbered-list" start="3"><li><strong>Git</strong>: Ensure you have Git installed. You can download it from <a href="https://git-scm.com/">Git official website</a>.</li></ol><ol type="1" id="d3d7fe13-ea38-4890-bd92-3c11550a4a85" class="numbered-list" start="4"><li><strong>Docker</strong>: Ensure you have Docker and Docker Compose installed. You can download them from <a href="https://www.docker.com/">Docker official website</a>.</li></ol><h3 id="734be3bb-c42e-435a-9094-820730eb0318" class="">Step-by-Step Installation Guide</h3><ol type="1" id="deb5d2bc-16af-43e1-91c4-8f2b91372827" class="numbered-list" start="1"><li><strong>Clone the Repository</strong><br/>Open your terminal and run the following command to clone the repository:<br/><script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js" integrity="sha512-7Z9J3l1+EYfeaPKcGXu3MS/7T+w19WtKQY/n+xzmw4hZhJ9tyYmcUS+4QqAlzhicE5LAfMQSF3iFTK9bQdTxXg==" crossorigin="anonymous" referrerPolicy="no-referrer"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism.min.css" integrity="sha512-tN7Ec6zAFaVSG3TpNAKtk4DOHNpSwKHxxrsiw4GHKESGPs5njn/0sMCUMl2svV4wo4BK/rCP7juYz+zx+l6oeQ==" crossorigin="anonymous" referrerPolicy="no-referrer"/><pre id="7edfc0ea-af78-4215-b528-fee2a116e18e" class="code"><code class="language-Plain Text" style="white-space:pre-wrap;word-break:break-all">git clone https://github.com/Awas96/Hotel_Registration.git
.sans { font-family: ui-sans-serif, -apple-system, BlinkMacSystemFont, "Segoe UI Variable Display", "Segoe UI", Helvetica, "Apple Color Emoji", Arial, sans-serif, "Segoe UI Emoji", "Segoe UI Symbol"; }
.code { font-family: "SFMono-Regular", Menlo, Consolas, "PT Mono", "Liberation Mono", Courier, monospace; }
.serif { font-family: Lyon-Text, Georgia, ui-serif, serif; }
.mono { font-family: iawriter-mono, Nitti, Menlo, Courier, monospace; }
.pdf .sans { font-family: Inter, ui-sans-serif, -apple-system, BlinkMacSystemFont, "Segoe UI Variable Display", "Segoe UI", Helvetica, "Apple Color Emoji", Arial, sans-serif, "Segoe UI Emoji", "Segoe UI Symbol", 'Twemoji', 'Noto Color Emoji', 'Noto Sans CJK JP'; }
.pdf:lang(zh-CN) .sans { font-family: Inter, ui-sans-serif, -apple-system, BlinkMacSystemFont, "Segoe UI Variable Display", "Segoe UI", Helvetica, "Apple Color Emoji", Arial, sans-serif, "Segoe UI Emoji", "Segoe UI Symbol", 'Twemoji', 'Noto Color Emoji', 'Noto Sans CJK SC'; }
.pdf:lang(zh-TW) .sans { font-family: Inter, ui-sans-serif, -apple-system, BlinkMacSystemFont, "Segoe UI Variable Display", "Segoe UI", Helvetica, "Apple Color Emoji", Arial, sans-serif, "Segoe UI Emoji", "Segoe UI Symbol", 'Twemoji', 'Noto Color Emoji', 'Noto Sans CJK TC'; }
.pdf:lang(ko-KR) .sans { font-family: Inter, ui-sans-serif, -apple-system, BlinkMacSystemFont, "Segoe UI Variable Display", "Segoe UI", Helvetica, "Apple Color Emoji", Arial, sans-serif, "Segoe UI Emoji", "Segoe UI Symbol", 'Twemoji', 'Noto Color Emoji', 'Noto Sans CJK KR'; }
.pdf .code { font-family: Source Code Pro, "SFMono-Regular", Menlo, Consolas, "PT Mono", "Liberation Mono", Courier, monospace, 'Twemoji', 'Noto Color Emoji', 'Noto Sans Mono CJK JP'; }
.pdf:lang(zh-CN) .code { font-family: Source Code Pro, "SFMono-Regular", Menlo, Consolas, "PT Mono", "Liberation Mono", Courier, monospace, 'Twemoji', 'Noto Color Emoji', 'Noto Sans Mono CJK SC'; }
.pdf:lang(zh-TW) .code { font-family: Source Code Pro, "SFMono-Regular", Menlo, Consolas, "PT Mono", "Liberation Mono", Courier, monospace, 'Twemoji', 'Noto Color Emoji', 'Noto Sans Mono CJK TC'; }
.pdf:lang(ko-KR) .code { font-family: Source Code Pro, "SFMono-Regular", Menlo, Consolas, "PT Mono", "Liberation Mono", Courier, monospace, 'Twemoji', 'Noto Color Emoji', 'Noto Sans Mono CJK KR'; }
.pdf .serif { font-family: PT Serif, Lyon-Text, Georgia, ui-serif, serif, 'Twemoji', 'Noto Color Emoji', 'Noto Serif CJK JP'; }
.pdf:lang(zh-CN) .serif { font-family: PT Serif, Lyon-Text, Georgia, ui-serif, serif, 'Twemoji', 'Noto Color Emoji', 'Noto Serif CJK SC'; }
</code></pre></li></ol><ol type="1" id="6f03df99-2ac8-4bf6-982a-412fb843e99a" class="numbered-list" start="2"><li><strong>Navigate to the Project Directory</strong><script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js" integrity="sha512-7Z9J3l1+EYfeaPKcGXu3MS/7T+w19WtKQY/n+xzmw4hZhJ9tyYmcUS+4QqAlzhicE5LAfMQSF3iFTK9bQdTxXg==" crossorigin="anonymous" referrerPolicy="no-referrer"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism.min.css" integrity="sha512-tN7Ec6zAFaVSG3TpNAKtk4DOHNpSwKHxxrsiw4GHKESGPs5njn/0sMCUMl2svV4wo4BK/rCP7juYz+zx+l6oeQ==" crossorigin="anonymous" referrerPolicy="no-referrer"/><pre id="260eab7d-e3b6-4b08-9957-0b1630652b5c" class="code"><code class="language-Plain Text" style="white-space:pre-wrap;word-break:break-all">cd Hotel_Registration
</code></pre></li></ol><ol type="1" id="9b289eed-323b-43fe-b54b-e2c378192a51" class="numbered-list" start="3"><li><strong>Set Up Environment Variables</strong><br/>Create a .env.local file in the main project directory and input your environment variables. While you can refer to the original .env file for guidance, i have ensured to include the a copy with the required  lines in this file.<br/><script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js" integrity="sha512-7Z9J3l1+EYfeaPKcGXu3MS/7T+w19WtKQY/n+xzmw4hZhJ9tyYmcUS+4QqAlzhicE5LAfMQSF3iFTK9bQdTxXg==" crossorigin="anonymous" referrerPolicy="no-referrer"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism.min.css" integrity="sha512-tN7Ec6zAFaVSG3TpNAKtk4DOHNpSwKHxxrsiw4GHKESGPs5njn/0sMCUMl2svV4wo4BK/rCP7juYz+zx+l6oeQ==" crossorigin="anonymous" referrerPolicy="no-referrer"/><pre id="271c3077-41d5-4fec-ac4e-a6bc0f7b9f9b" class="code"><code class="language-Plain Text" style="white-space:pre-wrap;word-break:break-all">APP_ENV=dev
APP_SECRET=3292d6aac1b68599be0f0d621b3f326f
DATABASE_URL=&quot;mysql://symfony:symfony@mysqldb:3306/hotel_database?serverVersion=9.0&quot;
CORS_ALLOW_ORIGIN=&#x27;^https?://(localhost|127\.0\.0\.1)(:[0-9]+)?$&#x27;
MAILER_URL=&quot;smtp://mailhog:1025?encryption=ssl&amp;auth_mode=login&amp;username=null&amp;password=null&quot;
MAILER_DSN=smtp://mailhog:1025
WEBHOOK_URL=&quot;https://webhook.site/e517553c-6fcb-4ade-9524-208e2d6c4068&quot;</code></pre></li></ol><ol type="1" id="89de6895-f276-4f11-8e2a-08b7302610f1" class="numbered-list" start="4"><li><strong>Install Dependencies</strong><br/>Run the following command to install all necessary dependencies:<br/><script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js" integrity="sha512-7Z9J3l1+EYfeaPKcGXu3MS/7T+w19WtKQY/n+xzmw4hZhJ9tyYmcUS+4QqAlzhicE5LAfMQSF3iFTK9bQdTxXg==" crossorigin="anonymous" referrerPolicy="no-referrer"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism.min.css" integrity="sha512-tN7Ec6zAFaVSG3TpNAKtk4DOHNpSwKHxxrsiw4GHKESGPs5njn/0sMCUMl2svV4wo4BK/rCP7juYz+zx+l6oeQ==" crossorigin="anonymous" referrerPolicy="no-referrer"/><pre id="0f967370-a5f2-4fa7-9fd3-fdb44d02a896" class="code"><code class="language-Plain Text" style="white-space:pre-wrap;word-break:break-all">composer install
</code></pre></li></ol><ol type="1" id="00a5b92c-071b-48ed-ae75-4970817fceb9" class="numbered-list" start="5"><li><strong>Start Docker Containers</strong><br/>Start the Docker containers defined in the <br/><code>docker-compose.yml</code> file:<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js" integrity="sha512-7Z9J3l1+EYfeaPKcGXu3MS/7T+w19WtKQY/n+xzmw4hZhJ9tyYmcUS+4QqAlzhicE5LAfMQSF3iFTK9bQdTxXg==" crossorigin="anonymous" referrerPolicy="no-referrer"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism.min.css" integrity="sha512-tN7Ec6zAFaVSG3TpNAKtk4DOHNpSwKHxxrsiw4GHKESGPs5njn/0sMCUMl2svV4wo4BK/rCP7juYz+zx+l6oeQ==" crossorigin="anonymous" referrerPolicy="no-referrer"/><pre id="a1cfea51-5c6b-41dc-ba53-7856ef0833a8" class="code"><code class="language-Plain Text" style="white-space:pre-wrap;word-break:break-all">docker compose up -d
</code></pre></li></ol><ol type="1" id="e07f8d7a-d8c7-4102-9f79-0b887ff7459e" class="numbered-list" start="6"><li><strong>Generate SSL Keys for JWT Authentication</strong><br/>Generate the private and public keys for JWT authentication:<br/><p id="e7d02416-73f4-45ca-8c52-31f78ef80835" class="">Note that the <code>setfacl</code> command relies on the <code>acl</code>  This is installed by default when using the API Platform docker distribution but may need to be installed in your working environment in order to execute the <code>setfacl</code> command..</p><p id="f09b9f72-e623-4ced-bd1c-3d7b8ee1e923" class="">In case the nginx container encounters an error, it is possible that there is a problem with the permissions on the fold.</p><script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js" integrity="sha512-7Z9J3l1+EYfeaPKcGXu3MS/7T+w19WtKQY/n+xzmw4hZhJ9tyYmcUS+4QqAlzhicE5LAfMQSF3iFTK9bQdTxXg==" crossorigin="anonymous" referrerPolicy="no-referrer"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism.min.css" integrity="sha512-tN7Ec6zAFaVSG3TpNAKtk4DOHNpSwKHxxrsiw4GHKESGPs5njn/0sMCUMl2svV4wo4BK/rCP7juYz+zx+l6oeQ==" crossorigin="anonymous" referrerPolicy="no-referrer"/><pre id="84904b82-c9a8-4e49-90fb-7c6e0ddb46ff" class="code"><code class="language-Plain Text" style="white-space:pre-wrap;word-break:break-all">docker exec -it hotel_registration_php sh        -c &#x27;
apk add openssl
mkdir var/cert/
cd var/cert/
echo &quot;your_secure_password&quot; &gt; global.pass
openssl genpkey -algorithm RSA -out server.key -aes256 -pass file:global.pass -pkeyopt rsa_keygen_bits:2048
openssl req -new -key server.key -out server.csr -passin file:global.pass
openssl rsa -in server.key -out server.key -passin file:global.pass
openssl x509 -req -days 365 -in server.csr -signkey server.key -out server.crt -passin file:global.pass
cd ../../
php bin/console lexik:jwt:generate-keypair
setfacl -R -m u:www-data:rX -m u:&quot;$(whoami)&quot;:rwX config/jwt
setfacl -dR -m u:www-data:rX -m u:&quot;$(whoami)&quot;:rwX config/jwt
&#x27;
</code></pre></li></ol><ol type="1" id="4b5a6d12-e42e-4d49-97c1-af14d6b842a4" class="numbered-list" start="7"><li><strong>Create Database</strong><br/>Execute the command below to generate the schema since the database has already been created by the docker compose component.<br/><script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js" integrity="sha512-7Z9J3l1+EYfeaPKcGXu3MS/7T+w19WtKQY/n+xzmw4hZhJ9tyYmcUS+4QqAlzhicE5LAfMQSF3iFTK9bQdTxXg==" crossorigin="anonymous" referrerPolicy="no-referrer"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism.min.css" integrity="sha512-tN7Ec6zAFaVSG3TpNAKtk4DOHNpSwKHxxrsiw4GHKESGPs5njn/0sMCUMl2svV4wo4BK/rCP7juYz+zx+l6oeQ==" crossorigin="anonymous" referrerPolicy="no-referrer"/><pre id="34dd1b94-e2b5-4b54-a60b-b3d8f45a5300" class="code"><code class="language-Plain Text" style="white-space:pre-wrap;word-break:break-all">
docker compose exec php bin/console doctrine:schema:update --force
</code></pre><p id="49a6d93b-7f29-4a4f-a348-fe7f0895334e" class="">
</p><p id="6a2b9413-f802-4de9-b456-82a7e7021ae1" class="">Restart the docker compose to refresh nginx with the updated certificate.</p><script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js" integrity="sha512-7Z9J3l1+EYfeaPKcGXu3MS/7T+w19WtKQY/n+xzmw4hZhJ9tyYmcUS+4QqAlzhicE5LAfMQSF3iFTK9bQdTxXg==" crossorigin="anonymous" referrerPolicy="no-referrer"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism.min.css" integrity="sha512-tN7Ec6zAFaVSG3TpNAKtk4DOHNpSwKHxxrsiw4GHKESGPs5njn/0sMCUMl2svV4wo4BK/rCP7juYz+zx+l6oeQ==" crossorigin="anonymous" referrerPolicy="no-referrer"/><pre id="376e1543-2c97-4644-8d3f-b37c3a7ed33a" class="code"><code class="language-Plain Text" style="white-space:pre-wrap;word-break:break-all">docker compose up -d
</code></pre></li></ol><p id="407002c1-6e20-41ae-b911-5702857fc901" class=""> At this time, you should have a functiona hotel_registration instance on your machine and prepared to begin working with it.</p><p id="b985c869-6f5d-4e7b-a734-e927e30ca2f9" class="">
</p></div></article><span class="sans" style="font-size:14px;padding-top:2em"></span></body></html>