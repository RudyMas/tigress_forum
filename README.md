# tigress_forum
A low wait forum for Tigress

## Database

Each forum repository creates its table in the default MySQL database if the
table is missing. On a fresh database, instantiate `ForumCategoriesRepo`,
`ForumTopicsRepo`, and `ForumPostsRepo` in that order to satisfy the foreign keys.

The topic holds the opening text. Posts hold replies. The topic type defaults
to `discussion` and leaves room for additional content types in the same schema.

The host application supplies `created_user_id` for topics and replies. The
schema leaves validation of those IDs to the host application's user integration.
