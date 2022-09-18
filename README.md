# ToDoアプリ

Laravelを利用したタスク管理用Webアプリケーション

## はじめに

本アプリは、Docker（WSL2）に Linux環境を構築するため、Ubuntu を使用しています。  
以下の手順でリポジトリをクローンする環境を作ります。

1. docker desktop をインストールし、起動

2. Microsoft Store から Ubuntu をインストール  
    今回使用したバージョンは「Ubuntu 20.04 LTS」

3. インストールが終了したらスタートメニューから Ubuntu を起動

4. エクスプローラーで「\\wsl$」へアクセス  
    docker-desktop, docker-desktop-data, Ubuntu-20.04 があることを確認する

5. PowerShell にて以下コマンド実行

    ```
    wsl --set-version Ubuntu-20.04 2
    wsl -l -v 　# Ubuntu-20.04がVERSION2となっていることを確認
    ```

6. DockerDesktop を開き、Settings > Resources > WSL INTEGRATION の Ubuntu-20.04 を ON に変更

7. スタートメニューから Ubuntu を起動し以下コマンド実行

    ```
    docker -v　# dockerのバージョンが表示されればOK
    ```

## インストール法、始め方

1. \wsl$\Ubuntu-20.04\home にToDo_Appディレクトリを作成  
※ユーザを作成している場合は、ユーザのディレクトリに作成

2. 作成したディレクトリに以下のリポジトリをクローン
    * https://github.com/siranai0T/Todo-app.git
    * https://github.com/siranai0T/Todo-docker.git

3. Todo-docker/.env.example ファイルをコピーし、.env へリネームする

4. Todo-app/.env.example ファイルをコピーし、.env へリネームする

5. Ubuntu にて以下コマンド実行

    ```
    # コンテナを作成して、起動させる
    cd /home/ToDo_App/Todo-docker
    docker compose build　# しばらく時間がかかる
    docker compose up -d

    # コンテナ内に入ってComposerをインストールする
    sudo docker exec -i -t Todo-docker-app-1 bash　#コンテナ内に入る方法は他にもあるので好きな方法で
    composer install

    # コンテナ内から出る
    exit
    ```

6. 以下にアクセスして、起動！！
    * http://localhost:82/todos

## 使い方のサマリー

* 一覧画面
    * タスクの一覧を表示
    * タスクの状態で絞込検索
    * カラム名を押下することで並び替え
    * タスクの削除、新規登録画面・詳細画面・編集画面への遷移

* 新規登録画面
    * タスクの新規登録  
      タイトル、詳細内容、期限、完了日、状態（）を入力・選択

* 詳細画面
    * タスクの詳細表示  
        登録された内容のすべてを表示

* 編集画面
    * タスクの編集

