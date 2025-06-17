public class Reptil extends Animal { //Nomes iguais e certinhos...
    public Reptil(String name, int age) {
        super(name, age); //Faz referência à superclasse.
    }

    @Override //Sobreescreve o método.
    public void makeSound() {
        System.out.println("Sssssss!");
    }
}