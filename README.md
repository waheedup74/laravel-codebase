## first run
- composer install

## second
- ```
    npm install
  ```
    
-     npm run dev


## Then run migration: php artisan migrate

## To run scheduler manually you need to run following command:
- php artisan schedule:run 
- OR
- php artisan call-api

## configuring the scheduler on your machine (Linux) -----this is just 1 time configuration for the sched
#### Run the following command
    - crontab -e (write the configuration in crontab open file or tab file)
    - * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1

# after the configuration abobve no need to run any commands for the scheduler
