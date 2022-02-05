# test_symfony
# Installation 
1. Cloner ou télécharger le repository 
2. Executer la commande composer install
3. Executer la commande yarn add bootstrap --dev
4. Executer la commande yarn encore dev --watch
5. Modifier le .env avec les information de la base de données
6. Créer la base de données avec la commande: php bin consoole doctrine:database:create
7. Creer les migrations avec la commande: php bin/console make:migratoin
8. Exécuter les migrations avec la commande: php bin/console doctrine:migrations:migrate
9. Seed les fausses données avec la commande: php bin/console doctrine:fixtures:load
10. Lancer le serveur avec la commande: symfony serve
11. Aller a https://127.0.0.1:8000/login
