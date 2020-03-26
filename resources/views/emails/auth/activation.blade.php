@component('mail::message')
# Aktivasi Akun Anda

Terimakasih Sudah Mendaftar, Mohon Aktivasi Akun Anda.

@component('mail::button', ['url' => route('travel.activate', [
                                    'token' => $travel->activation_token,
                                    'email' => $travel->email
                                    ])
                            ]
           )
Aktivasi
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
