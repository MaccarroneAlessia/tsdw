package edu.unict.tsdw.springboot.authors.controllers;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import edu.unict.tsdw.springboot.authors.data.AuthorRepository;
import edu.unict.tsdw.springboot.authors.models.Author;

@Controller
public class AuthorController {
    private AuthorRepository repository;

    public AuthorController(AuthorRepository repository){
        this.repository = repository;
    }

    //metodi get
    @GetMapping("/select")
    public String select(Model model){
        model.addAttribute("elenco", repository.findAll());
        //model.addAttribute("contatore", repository.count());
        return "select";
    }

    @GetMapping("/create")
    public String create(){
        return "create";
    }

    //metodi post
    @PostMapping("/create")
    public String create(@ModelAttribute Author autore){
        repository.save(autore);
        return "redirect:/select";
    }

    @PostMapping("/elimina")
    public String elimina(@RequestParam("id") Long id){
        Author autore = repository.getReferenceById(id);
        repository.delete(autore);
        return "redirect:/select";
    }

}