```mermaid
sequenceDiagram
    participant User
    participant Controller
    User->>Controller: Envía correo electrónico y contraseña
    Controller->>Controller: Valida datos del usuario
    Controller->>User: Genera token de acceso
