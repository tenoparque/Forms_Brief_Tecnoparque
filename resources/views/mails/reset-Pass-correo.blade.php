  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Correo electrónico con estilos CSS usando tablas</title>
  </head>

  <body>
      <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center"
          style="margin: auto; max-width: 600px; width: 100%;">
          <tr>
              <td style="padding: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center"
                      style="margin: auto; background-color: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                      <tr>
                          <td style="padding: 20px;">
                              <h1 style="color: #333; font-size: 24px; "><span
                                      style="color: {{ $colorSecundario }}">Hola,</span>
                                  <span style="color: {{ $colorPrincipal }}">{{ $user->name }}
                                      {{ $user->apellidos }}</span>
                              </h1>
                              <p style="color: #666; font-size: 16px;padding-bottom: 15px;">Está siendo notificado
                                  mediante este correo
                                  electrónico debido a que hemos registrado una petición de restablecimiento de
                                  contraseña
                                  para su cuenta.</p>
                              <p>@lang('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')])</p>


                              <a class="btnResetYourPassword"
                                  style="border: 2px solid #82def0;color: #00324d;border-radius: 35px;background: #fff; padding: 10px 24px;text-align: center;text-decoration: none;font-size: 14px;"
                                  href="{{ route('password.reset', ['token' => $token]) }}">Cambia tu contraseña</a>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
      </table>
  </body>
