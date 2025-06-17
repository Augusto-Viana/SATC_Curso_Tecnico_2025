public class Ave extends Animal {
    public Ave(String name, int age) {
        super(name, age);
    }

    @Override
    public void makeSound() {
        System.out.println(name + "Piu Piu!");
    }
}