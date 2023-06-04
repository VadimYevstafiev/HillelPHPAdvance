-- Active: 1683388537085@@127.0.0.1@5432@mvc_db@public
CREATE TABLE IF NOT EXISTS shared_notes (
    note_id BIGINT CHECK (note_id >= 0),
    user_id INT CHECK (note_id >= 0),

    PRIMARY KEY (note_id, user_id)
);