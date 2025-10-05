CREATE TABLE articles (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    category_id INT NOT NULL,
    content TEXT NOT NULL,
    status ENUM('draft','published') NOT NULL DEFAULT 'draft',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_articles_category FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE TABLE article_tag (
    article_id INT NOT NULL,
    tag_id INT NOT NULL,
    PRIMARY KEY (article_id, tag_id),
    CONSTRAINT fk_article_tag_article FOREIGN KEY (article_id) REFERENCES articles(id) ON DELETE CASCADE,
    CONSTRAINT fk_article_tag_tag FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE
);

