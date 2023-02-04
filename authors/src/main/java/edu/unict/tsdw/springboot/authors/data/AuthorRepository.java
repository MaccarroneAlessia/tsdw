package edu.unict.tsdw.springboot.authors.data;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;
import edu.unict.tsdw.springboot.authors.models.Author;

@Repository
public interface AuthorRepository extends JpaRepository<Author, Long>{}