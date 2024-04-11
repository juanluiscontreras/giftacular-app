```mermaid
erDiagram
    USER {
        id INT PK
        email VARCHAR
        password VARCHAR
        created_at TIMESTAMP
        updated_at TIMESTAMP
    }

    FAVORITE_GIF {
        id INT PK
        gif_id INT
        alias VARCHAR
        user_id INT FK
        created_at TIMESTAMP
        updated_at TIMESTAMP
    }

    USER ||--o{ FAVORITE_GIF : "1 *-- 0..*"