import { User } from '../entities/User';

import { AppDataSource } from "../data-source";
import { IUserService } from './abstractions/IUserService';
import { InvalidRequestError, NotFoundError } from '../errors';

const userRepository = AppDataSource.getRepository(User)

export class UserService implements IUserService {

    async save(user: User): Promise<User> {
        let isEmailAvailable = await this.getByEmail(user.email) == null;

        if (!isEmailAvailable) {
            throw new InvalidRequestError("E-mail is not available")
        }

        const savedUser = await userRepository.save(user);

        return savedUser;
    }

    async getAll(): Promise<User[]> {
        return await userRepository
            .createQueryBuilder("User")
            .select(['User.id', 'User.name', 'User.email', 'User.active', 'User.phoneNumber'])
            .getMany();
    }

    async getById(id: number): Promise<User> {
        let user = await userRepository
            .createQueryBuilder("User")
            .where({ id: id })
            .select(['User.id', 'User.name', 'User.email', 'User.active', 'User.phoneNumber'])
            .getOne();

        if (user == null) {
            throw new NotFoundError();
        }

        return user;
    }

    private async getByEmail(email: string): Promise<User> {
        return await userRepository.findOneBy({ email: email });
    }

    async softDeleteById(id: number) {
        const userDb = await this.getById(id);

        userDb.active = false;

        return await userRepository.save(userDb);
    }

    async updateById(id: number, user: User): Promise<User> {
        const userDb = await this.getById(id);

        userDb.name = user.name;
        userDb.email = user.email;
        userDb.active = user.active;

        return await userRepository.save(userDb);
    }
}