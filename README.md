# FROGS仕様書
## 必須
markdownがnamespaceを利用するため、  
php >= 5.3  

## 設定が終わりましたら
application.iniのDEBUGMODEを"no"にして本番稼働としてください。

## 設定

### conf/application.ini
アプリケーション全体の設定を行う。  

### ヘルプ
help/配下にmarkdownファイルを順番に配置する。  
ファイル名に01.などの連番を最初につけてやると順番制御できます。

## 配置
gitからcloneする

## 制限事項
help配下のファイルはgrepの対象となるため、ファイル名は[a-Z0-9]*.mdでお願いします。


