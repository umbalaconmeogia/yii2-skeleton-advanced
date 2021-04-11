# Database preparation

1. Create PostgreSQL database
  * On Windows, open PostgreSQL shell
    ```shell
    psql -U postgres
    ```
  * Run SQL command
    ```SQL
    CREATE USER yii2_skeleton WITH PASSWORD 'yii2_skeleton';

    CREATE DATABASE yii2_skeleton;
    GRANT ALL PRIVILEGES ON DATABASE yii2_skeleton TO yii2_skeleton;

    \q # quit
    ```
2. Drop database
  ```SQL
  DROP DATABASE IF EXISTS yii2_skeleton;
  ```

3. Another backup and restore
  ```SQL
  pg_dump -U postgres --clean -Fp yii2_skeleton > yii2_skeleton.sql
  psql -f yii2_skeleton.sql yii2_skeleton postgres
  ```
3. Zip
  ```shell
  zip -r mail.zip mail
  ```
3. Dump database
  * On Linux
    ```SQL
    sudo -u postgres pg_dump -Fc "yii2_skeleton" > yii2_skeleton.pg_dump
    ```

  * On Windows
    ```SQL
    pg_dump -U postgres -Fc "yii2_skeleton" > yii2_skeleton.pg_dump
    ```

4. Restore from DB dump
  * On Linux
    ```SQL
    ```

  * On Windows
    ```SQL
    pg_restore -U postgres --clean -d yii2_skeleton yii2_skeleton.pg_dump
    ```
