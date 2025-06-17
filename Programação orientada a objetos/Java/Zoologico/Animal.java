public class Animal { //Superclasse, tem que ter o nome igual a do arquivo.
    String name; //Váriaveis: Nada(Apenas classes do mesmo pacote acessam), Public(Qualquer classe de qualquer pacote), Protected(A própria classe, todas as subclasses e outras do mesmo pacote) e Private(Somente a própria classe).
    int age;

    public Animal(String name, int age) {
        this.name = name; //This. aponta para o próprio objeto, é só isso memo.
        this.age = age;
    }

    public void makeSound() { //Aplica em qualquer animal por padrão.
        Systeml.out.println("Som genérico de animal");
    }

    public void showInfo() { //Aplica em qualquer animal por padrão.
        System.out.println("Nome: " + name + ", Idade: " + age);
    }
}