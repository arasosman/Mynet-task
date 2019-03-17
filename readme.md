
## Proje Hakkında

**1. ödev** 

Proje backend tarafı laravel 5.8 ile yazılmıştır.
Frontent tarafı VueJs ile yazılmıştır.

Veri tabanı olarak Mysql kullanılmıştır. (Sqlite ile localimde yaptım ancak herokuda paylaşırken sorunu gideremedim.)

Cacheler redis sunucuda tutulmaktadır. (Sunucu heroku tarafından sağlanmıştır.).

Vuejs Repo: https://github.com/arasosman/mynet-vuejs



**2. ödev.**

Bir middleware yardımı ile log tutulmaktadır. Loglar veritabınına kaydedilmektedir. Tüm loglara
/api/access_logs adresinden ulaşabilirsiniz.

Rabbitmq yapılandırmasında sorun yaşadım. yeterli zamanım olmadığı için logları veritabanına kaydettim. Cacheler redisten gelmektedir.
