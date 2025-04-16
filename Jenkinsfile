pipeline {
    agent any

    stages {
        stage('Clone Repo') {
            steps {
                git 'https://github.com/Karthik123467/jenkins-project.git'
            }
        }

        stage('Rebuild Docker') {
            steps {
                bat 'docker-compose down'
                bat 'docker-compose up'
            }
        }
    }
}
