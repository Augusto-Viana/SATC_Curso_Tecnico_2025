public class Ave extends Animal { //Nomes iguais e certinhos...
    public Ave(String name, int age) {
        super(name, age); //Faz referência à superclasse.
    }

    @Override //Sobreescreve o método.
    public void makeSound() {
        System.out.println(name + "Piu Piu!");
    }
}