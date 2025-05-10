# budget app
## Ishga tushirish
### Git orqali yuklab olamiz
```bash
git clone https://github.com/khamdullaevuz/budget-app && cd budget-app
```
### Docker compose orqali ishga tushiramiz
```bash
docker compose up --build -d
```
### Migration va seederlarni ishga tushiramiz:
```bash
docker exec -it app php artisan migrate && docker exec -it app php artisan db:seed
```
#### Defaul login parol:
```
Login: admin
Parol: password
```
