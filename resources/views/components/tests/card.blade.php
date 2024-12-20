@props([
  'title',
  'message' => '初期値です',
  'contents' => '本文初期値です'
  ])

<div {{ $attributes->merge([
  'class' => 'border-2 shadow-md w-1/4 p-2'
  ]) }} >
  <div>{{ $title }}</div>
  <div>画像</div>
  <div>{{ $contents }}</div>
  <div>{{ $message }}</div>
</div>