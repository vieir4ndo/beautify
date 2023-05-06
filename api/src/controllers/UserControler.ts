import { Request, Response } from 'express';
import { User } from "../entities/User";
import { UserService } from "../services/UserService";
import { IUserController } from './abstractions/IUserController';

const userService = new UserService();

export class UserController implements IUserController {

    async save(request: Request, response: Response) {
        
        const { name, email, password, phoneNumber } = request.body;

        const user = new User(name, email, password, phoneNumber);
        
        let savedUser = await userService.save(user);

        return response.status(200).json({
            success: true,
            data: savedUser,
            errors: null,
        });
    }

    async getAll(request: Request, response: Response) {

        let allUsers = await userService.getAll();

        response.json(allUsers);
    }

    async getById(request: Request, response: Response) {

        let user = await userService.getById(parseInt(request.params.id));

        return response.status(200).json(user);
    }

    async deleteById(request: Request, response: Response) {
        await userService.deleteById(parseInt(request.params.id));

        response.send().status(204);
    }

    async updateById(request: Request, response: Response) {
        const { name, email, password, password2, phoneNumber } = request.body;

        const user = new User(name, email, password, phoneNumber);

        let userSaved = await userService.updateById(parseInt(request.params.id), user);

        response.json(userSaved);
    }
}

