import java.util.ArrayList;
import java.util.Scanner;

public class Zoologico {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        ArrayList<Animal> animalList = new ArrayList<>();
        
        String[][] map = new String[5][5];

        boolean working = true;

        while (working) {
            System.out.println("\n--- Zoológico do Seu Zé ---\n1 - Adicionar animal\n2 - Exibir animais\n3 - Emitir som dos animais\n4 - Posicionar animal no mapa\n5 - Exibir mapa do zoológico\n0 - Sair\nEscolha uma opção: ");

            int option = scanner.nextInt();
            scanner.nextLine();

            switch (option) {
                case 1:
                    System.out.print("Digite o nome do animal: ");
                    String name = scanner.nextLine();

                    System.out.print("Digite a idade do animal: ");
                    int age = scanner.nextInt();
                    scanner.nextLine();

                    System.out.println("Escolha o tipo de animal:\n1 - Mamífero\n2 - Ave\n3 - Réptil");
                    int type = scanner.nextInt();
                    scanner.nextLine();

                    Animal newAnimal = null;
                    if (type == 1) {
                        newAnimal = new Mamifero(name, age);
                    } else if (type == 2) {
                        newAnimal = new Ave(name, age);
                    } else if (type == 3) {
                        newAnimal = new Reptil(name, age);
                    } else {
                        System.out.println("Tipo de animal inválido!");
                        break;
                    }

                    animalList.add(newAnimal);
                    System.out.println("Animal adicionado com sucesso!");
                    break;

                case 2:
                    System.out.println("\n--- Lista de animais ---");
                    for (Animal animal : animalList) {
                        animal.showInfo();
                    }
                    break;
                case 3:
                    System.out.println("\n--- Sons de animais ---");
                    for (Animal animal : animalList) {
                        animal.makeSound();
                    }
                    break;
                case 4:
                    System.out.print("Digite o índice do animal para posicionar (0 a " + (animalList.size() - 1) + "): ");
                    int index = scanner.nextInt();
                    scanner.nextLine();

                    if (index >= 0 && index < animalList.size()) {
                        System.out.print("Linha (0 a 4): ");
                        int line = scanner.nextInt();
                        scanner.nextLine();
                        System.out.print("Coluna (0 a 4): ");
                        int column = scanner.nextInt();
                        scanner.nextLine();

                        if (line >= 00 && line < 5 && column >= 0 && column) {
                            map[line][column] = animalList .get(index).name;
                            System.out.println("Animal posicionado no mapa!");
                        } else {
                            System.out.println("Posição inválida!");
                        }
                    } else {
                        System.out.println("Índice inválido!");
                    }
                    break;

                case 5:
                    System.out.println("\n--- Mapa do zoológico ---");
                    for (int i = 0; i < map.length; i++) {
                        for (int x = 0; x < map[i].length; x++) {
                            if (map[i][x] != null) {

                            } else {
                                System.out.print("[Vazio] ");
                            }
                        }
                        System.out.println();
                    }
                    break;

                case 0:
                    working = false;
                    break;

                default:
                    System.out.println("Opção inválida!");
            }
        }

        scanner.close();
        System.out.println("Programa encerrado, obrigado por visitar o zoológico do Seu Zé!");
    }
}