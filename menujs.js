	//ここは別のjavascriptにまとめる。メニュー作成時に同時生成するようにする
	document.getElementById('addButton').addEventListener('click', function() {
  // テーブルに新しい行を追加します
  var row = document.createElement('tr');
  
  // メニュー名、数量、価格を含むセルを作成し、新しい行に追加します
  row.appendChild(document.createElement('td')).innerText = 'Special Dinner';
  row.appendChild(document.createElement('td')).innerText = '1';
  row.appendChild(document.createElement('td')).innerText = '$22.79';
  
  // 新しい行をテーブルに追加します
  document.getElementById('menuTable').getElementsByTagName('tbody')[0].appendChild(row);
});