public class Mamifero extends Animal { //Nomes iguais e certinhos...

    public Mamifero(String name, int age) {
        super(name, age); //Faz referência à superclasse.
    }

    @Override //Sobreescreve o método.
    public void makeSound() {
        System.out.println(name + "Roar!");
    }
}