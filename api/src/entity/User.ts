import { Entity, PrimaryGeneratedColumn, Column } from "typeorm"

//decorator
@Entity()
export class User {

    @PrimaryGeneratedColumn()
    id: number

    @Column()
    name: string

    @Column()
    email: string

    constructor(name: string, email: string) {
        this.name = name;
        this.email = email;
    }

}
