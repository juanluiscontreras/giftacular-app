```mermaid
usecase GuardarGIFFavorito {
    title: Guardar GIF Favorito
    actor Usuario
    Usuario --> (Enviar ID del GIF, Alias y ID de Usuario)
    (Enviar ID del GIF, Alias y ID de Usuario) --> (Validar Datos)
    (Validar Datos) --> (Guardar en Base de Datos)
    (Guardar en Base de Datos) --> (Devolver Confirmación)
    (Devolver Confirmación) --> Usuario
}