```mermaid
sequenceDiagram
    participant User
    participant Controller
    participant Database
    User->>Controller: Envía ID del GIF, alias y ID de usuario
    Controller->>Database: Guarda GIF como favorito
    Database-->>Controller: Confirmación de guardado
    Controller-->>User: Devuelve código HTTP correspondiente