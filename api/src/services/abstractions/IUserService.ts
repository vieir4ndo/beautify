import { User } from '../../entity/User';

export interface IUserService {

    save(user: User): Promise<User>;
    getAll(): Promise<User[]>;
    getById(id: number): Promise<User>;
    deleteById(id: number): void;
    updateById(id: number, user: User): Promise<User>;
}