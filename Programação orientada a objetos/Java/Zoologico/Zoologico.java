import java.util.ArrayList; //Importa o ArrayList.
import java.util.Scanner; //Importa o Scanner.

public class Zoologico {
    public static void main(String[] args) { //Void main, onde o menu vai.
        Scanner scanner = new Scanner(System.in); //Criação do Scanner.
        ArrayList<Animal> animalList = new ArrayList<>(); //Criação do ArrayList.
        
        String[][] map = new String[5][5]; //Criação da bendita matriz. "Map" é de mapa, tipo, mapa do zoológico.

        boolean working = true; //Isso aqui é só pra fazer o while funcionar.

        while (working) {
            System.out.println("\n--- Zoológico do Seu Zé ---\n1 - Adicionar animal\n2 - Exibir animais\n3 - Emitir som dos animais\n4 - Posicionar animal no mapa\n5 - Exibir mapa do zoológico\n0 - Sair\nEscolha uma opção: ");

            int option = scanner.nextInt();
            scanner.nextLine(); //Limpa o buffer, como de costume.

            switch (option) { //Switch case sempre acaba sendo uma mão na roda.
                case 1: //O case tem que ter o mesmo valor pedido pelo usuário.
                    System.out.print("Digite o nome do animal: ");
                    String name = scanner.nextLine();

                    System.out.print("Digite a idade do animal: ");
                    int age = scanner.nextInt();
                    scanner.nextLine();

                    System.out.println("Escolha o tipo de animal:\n1 - Mamífero\n2 - Ave\n3 - Réptil");
                    int type = scanner.nextInt();
                    scanner.nextLine();

                    Animal newAnimal = null; //Esse cara aqui faz referência ao método que vai ser utilizado, sem precisar ficar declarando ele.
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

                    animalList.add(newAnimal); //Adiciona coisas a lista.
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
                case 4: //Esse cara aqui é complicado...
                    System.out.print("Digite o índice do animal para posicionar (0 a " + (animalList.size() - 1) + "): ");
                    int index = scanner.nextInt();
                    scanner.nextLine();

                    if (index >= 0 && index < animalList.size()) { //Verifica se o usuário colocou o número certo de animais.
                        System.out.print("Linha (0 a 4): ");
                        int line = scanner.nextInt(); //Determina a linha onde ele vai ser posicionado.
                        scanner.nextLine();
                        System.out.print("Coluna (0 a 4): ");
                        int column = scanner.nextInt(); //Determina a coluna onde ele vai ser posicionado.
                        scanner.nextLine();

                        if (line >= 0 && line < 5 && column >= 0 && column < 5) { //Verifica se o valor de linhas e colunas está certo.
                            map[line][column] = animalList .get(index).name; //Atualiza o "tabuleiro" da mtraiz, adicionando o animal nas coordenadas informadas.
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
                    for (int i = 0; i < map.length; i++) { //Mostra o mapa.
                        for (int x = 0; x < map[i].length; x++) {
                            if (map[i][x] != null) {

                            } else {
                                System.out.print("[Vazio] ");
                            }
                        }
                        System.out.println();
                    }
                    break;

                case 0: //Encerra o código.
                    working = false;
                    break;

                default: //Padrão do switch case, é obrigatório ter.
                    System.out.println("Opção inválida!");
            }
        }

        scanner.close();
        System.out.println("Programa encerrado, obrigado por visitar o zoológico do Seu Zé!"); //Tchau tchau!
    }
}