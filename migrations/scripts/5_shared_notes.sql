-- Active: 1683388537085@@127.0.0.1@5432@mvc_db@public
CREATE TABLE IF NOT EXISTS shared_notes (
    note_id BIGINT,
    user_id INT,

    PRIMARY KEY (note_id, user_id)
);