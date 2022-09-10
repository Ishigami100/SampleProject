@component('mail::message')
# Introduction
## h2

- list1
- list2
- list3

---
{{ $user_name }}

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

@component('mail::panel')
ここはパネルの内容です。
@endcomponent

@component('mail::table')
| Laravel | テーブル | 例 |
| ------------- |:-------------:| --------:|
| 第２カラムは | 中央寄せ | $10 |
| 第３カラムは | 右寄せ | $20 |
@endcomponent

{{ __('auth.password') }} <br>
{{__('Done.')}}<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
