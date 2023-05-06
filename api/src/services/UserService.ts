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
        return await userRepository.find();
    }

    async getById(id: number): Promise<User> {
        let user = await userRepository.findOneBy({ id: id });

        if (user == null) {
            throw new NotFoundError();
        }

        return user;
    }

    private async getByEmail(email: string): Promise<User> {
        return await userRepository.findOneBy({ email: email });
    }

    async deleteById(id: number) {
        const user = await userRepository.findOneBy({ id: id });

        await userRepository.delete(user);
    }

    async updateById(id: number, user: User): Promise<User> {
        const userDb = await userRepository.findOneBy({ id: id });

        userDb.name = user.name;
        userDb.email = user.email;
        userDb.active = user.active;

        return await userRepository.save(userDb);
    }
}