#画像からリストを作成。この後はメニュー表(画像込み)を自動作成する必要がある。
import os
import pandas as pd
import argparse

def main(directory):
   # ディレクトリ内の全てのファイル名を取得
   filenames = os.listdir(directory)

   # 初期化
   data = []

   # 各ファイル名を解析
   for filename in filenames:
       name, category, price, description = filename[:-4].split('_') # ファイル拡張子を除去
       data.append({
           'name': name,
           'category': category,
           'price': price,
           'description': description
       })

   # pandas DataFrameに変換
   df = pd.DataFrame(data)

   # DataFrameをCSVファイルに出力
   df.to_csv("foods.csv", index=False)

if __name__ == "__main__":
   parser = argparse.ArgumentParser()
   parser.add_argument("-src", type=str, required=True)
   args = parser.parse_args()

   main(args.src)
