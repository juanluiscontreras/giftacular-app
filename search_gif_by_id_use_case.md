```mermaid
usecase BuscarGIFporID {
    title: Buscar GIF por ID
    actor Usuario
    Usuario --> (Enviar ID del GIF)
    (Enviar ID del GIF) --> (Validar ID)
    (Validar ID) --> (Consultar API de Giphy para Obtener Información)
    (Consultar API de Giphy para Obtener Información) --> (Devolver Datos del GIF)
    (Devolver Datos del GIF) --> Usuario
}