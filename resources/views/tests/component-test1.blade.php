<x-tests.app>
  <x-slot name="header">ヘッダー1</x-slot>

コンポーネントテスト１
<x-tests.card title="タイトル1" contents="本文1" :message="$message" />
<x-tests.card title="タイトル2" />
<x-tests.card title="CSSを変更したい" class="bg-blue-400"/>
</x-tests.app>
