public class Reptil extends Animal {
    public Reptil(String name, int age) {
        super(name, age);
    }

    @Override
    public void makeSound() {
        System.out.println("Sssssss!");
    }
}