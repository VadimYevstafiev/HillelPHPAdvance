-- Active: 1683388537085@@127.0.0.1@5432@mvc_db@public
CREATE TABLE IF NOT EXISTS notes (
    id BIGINT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    author_id INT NOT NULL CHECK (author_id >= 0),
    folder_id INT NOT NULL CHECK (folder_id >= 0),
    content TEXT,
    pinned BOOL DEFAULT false,
    completed BOOL DEFAULT false,
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
);