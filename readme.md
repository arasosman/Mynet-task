
## Proje Hakkında

# 1. ödev

Proje backend tarafı laravel 5.8 ile yazılmıştır.
Frontent tarafı VueJs ile yazılmıştır.

Veri tabanı olarak Mysql kullanılmıştır. (Sqlite ile localimde yaptım ancak herokuda paylaşırken sorunu gideremedim.)

Cacheler redis sunucuda tutulmaktadır. (Sunucu heroku tarafından sağlanmıştır.).

Vuejs Repo: https://github.com/arasosman/mynet-vuejs

Heroku linki: https://mynet-laravel.herokuapp.com/

# 2. ödev

Bir middleware yardımı ile log tutulmaktadır. Loglar veritabınına kaydedilmektedir. Tüm loglara
/api/access_logs adresinden ulaşabilirsiniz.

Token kütüphanesi olarak laravel Passport kullanılmıştır.

Rabbitmq yapılandırmasında sorun yaşadım. yeterli zamanım olmadığı için logları veritabanına kaydettim. Cacheler redisten gelmektedir.


Heroku linki: https://mynet-task2.herokuapp.com/

# Api Döküman


| post: /login| {"email","password"}| return => json token
|post: /register|{"name","email","password"}| return => json{User}
| get: /access_logs |  | return => json

