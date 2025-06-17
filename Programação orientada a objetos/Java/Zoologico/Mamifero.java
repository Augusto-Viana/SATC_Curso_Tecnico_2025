public class Mamifero extends Animal {

    public Mamifero(String name, int age) {
        super(name, age);
    }

    @Override
    public void makeSound() {
        System.out.println(name + "Roar!");
    }
}